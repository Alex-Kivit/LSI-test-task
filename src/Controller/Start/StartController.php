<?php

namespace App\Controller\Start;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Repository\ExportRepository;

class StartController extends Controller {
    /**
     * @Route("/", name="start")
     * @Method({"GET"})
     */
    public function index(ExportRepository $exportRepo, Request $request)
    {
        //Get search parameters
        $lokal = $request->get('lokal');
        $startDate = date_create_from_format('d-m-Y', $request->get('start'));
        $endDate = date_create_from_format('d-m-Y', $request->get('end'));

        $exportHistory = $exportRepo->findAllSearch($lokal, $startDate, $endDate);

        return $this->render('start/start.html.twig', array(
            'exportHistory' => $exportHistory
        ));
    }

}