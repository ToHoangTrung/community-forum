<?php


namespace app\core\mvc;

use app\core\mvc\controllers\BaseController;
use app\core\mvc\procedures\Request;
use app\core\mvc\procedures\Response;
use app\core\orm\Database;
use app\model\entity\User;

class Application
{
    const EVENT_BEFORE_REQUEST = 'beforeRequest';
    const EVENT_AFTER_REQUEST = 'afterRequest';

    protected array $eventListeners = [];

    public static Application $app;
    public static string $ROOT_DIR;
    public static string $PUBLIC_PATH;
    public string $userClass;
    public string $layout = 'default-template';
    public Router $router;
    public Request $request;
    public Response $response;
    public ?BaseController $controller = null;
    public Session $session;
    public View $view;
    public ?User $user;
    public Database $db;

    public function __construct($rootDir, $config)
    {
        $this->user = null;
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootDir;
        self::$PUBLIC_PATH = $config['publicPath'];
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
        $this->session = new Session();
        $this->view = new View();

        $userId = Application::$app->session->get('user');
        if ($userId) {
//            $key = $this->userClass::primaryKey();
//            $key = 'id';
            $this->user = $this->userClass::findOne(['id' => $userId]);
        }
    }

    public static function isGuest(): bool
    {
        return !self::$app->user;
    }

    public static function isAdmin(): bool
    {
        return !self::$app->user->is_admin;
    }

    public function login(User $user): bool
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $value = $user->{$primaryKey};
        Application::$app->session->set('user', $value);

        return true;
    }

    public function logout()
    {
        $this->user = null;
        self::$app->session->remove('user');
    }

    public function run()
    {
        $this->triggerEvent(self::EVENT_BEFORE_REQUEST);
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            echo $this->router->renderView('_error', [
                'exception' => $e,
            ]);
        }
    }

    public function triggerEvent($eventName)
    {
        $callbacks = $this->eventListeners[$eventName] ?? [];
        foreach ($callbacks as $callback) {
            call_user_func($callback);
        }
    }

    public function on($eventName, $callback)
    {
        $this->eventListeners[$eventName][] = $callback;
    }
}