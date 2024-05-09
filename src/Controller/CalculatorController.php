<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    #[Route('/calculator', name: 'calculator')]
    public function calculator(Request $request): Response
    {
        $result = null;

        if ($request->request->has('submit')) {
            $num1 = $request->request->get('num1');
            $num2 = $request->request->get('num2');
            $operator = $request->request->get('operator');

            switch ($operator) {
                case 'add':
                    $result = $num1 + $num2;
                    break;
                case 'subtract':
                    $result = $num1 - $num2;
                    break;
                case 'multiply':
                    $result = $num1 * $num2;
                    break;
                case 'divide':
                    if ($num2 != 0)
                        $result = $num1 / $num2;
                    else
                        $result = "Cannot divide by zero!";
                    break;
                default:
                    $result = "Invalid operator";
                    break;
            }
        }

        return $this->render("calculator/index.html.twig", [
            'result' => $result
        ]);
    }
}