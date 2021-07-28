<?php


namespace app\controller;


use app\core\mvc\controllers\BaseController;
use app\core\mvc\procedures\Request;
use app\services\CatalogService;
use app\services\PostService;
use app\services\ReportService;

class ReportController extends BaseController
{

    private ReportService $reportService;

    public function __construct()
    {
        $this->reportService = new ReportService();
    }

    public function adminReports() {
        $reports = $this->reportService->getAllReport();
        $this->setLayout('admin-template');
        return $this->render('admin/admin-reports-management',[
            'css' => 'admin-reports-management.css',
            'reports' => $reports,
        ]);
    }

    public function adminReportDetail(Request $request) {
        $ratingId = $request->getBody()['id'];
        $report = $this->reportService->getReportById($ratingId);
        $this->setLayout('admin-template');
        return $this->render('admin/admin-report-detail-management',[
            'css' => 'admin-report-detail-management.css',
            'report' => $report,
        ]);
    }

    public function getAllPostReport(Request $request) {
        $postId = $request->getBody()['id'];
        $reports = $this->reportService->getReportsByPostId($postId);
        $this->setLayout('admin-template');
        return $this->render('admin/admin-report-detail-management',[
            'css' => 'admin-report-detail-management.css',
            'reports' => $reports,
        ]);
    }
}
