<?php


namespace app\services;


use app\core\mvc\Application;

class ReportService
{

    public function getAllReport()
    {
        $stmt = Application::$app->db->prepare("select * from report where report.id >= :id");
        $stmt->execute(['id' => 1]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $reports = $stmt->fetchAll();

        $userService = new UserService();
        $postService = new PostService();

        foreach ($reports as &$report){
            $report['created_date'] = FunctionalService::formatDisplayDatetime($report['created_date']);
            $report['user'] = $userService->getUserById($report['user_id']);
            $report['post'] = $postService->getPostById($report['post_id']);
        }
        return $reports;
    }

    public function getReportById(string $id)
    {
        $stmt = Application::$app->db->prepare("select * from report where report.id = :id");
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $reports = $stmt->fetchAll();

        $userService = new UserService();
        $postService = new PostService();

        foreach ($reports as &$report){
            $report['created_date'] = FunctionalService::formatDisplayDatetime($report['created_date']);
            $report['user'] = $userService->getUserById($report['user_id']);
            $report['post'] = $postService->getPostById($report['post_id']);
        }
        return $reports[0];
    }

    public function getReportsByPostId(string $postId)
    {
        $stmt = Application::$app->db->prepare("select * from report where report.post_id = :id");
        $stmt->execute(['id' => $postId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $reports = $stmt->fetchAll();

        $userService = new UserService();

        foreach ($reports as &$report){
            $report['created_date'] = FunctionalService::formatDisplayDatetime($report['created_date']);
            $report['user'] = $userService->getUserById($report['user_id']);
        }
        return $reports;
    }

}
