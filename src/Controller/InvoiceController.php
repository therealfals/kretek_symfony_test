<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Entity\InvoiceLine;
use App\Form\InvoiceLineType;
use App\Form\InvoiceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class InvoiceController extends BaseController {
   public function __construct(EntityManagerInterface $em, ValidatorInterface $validator)
   {
       parent::__construct($em, $validator);
   }

    /**
     * @Route("/", name="invoiceForm")
     */
    public function invoiceView(Request $request){
        return $this->render('invoice/add-invoice.html.twig',['message'=>'','errors'=>[]]);
    }
    /**
     * @Route("/invoice", name="invoice")
     */
    public function addInvoice(Request $request){
        if ($request->isMethod('POST') ){
            $post=$request->request->all();
            $invoice=$this->update($post,  $this->container->get('form.factory'), InvoiceType::class, new Invoice());
            if (!is_array($invoice)){
                $invoice->setInvoiceDate(new \DateTime($post['invoiceDate']));
                $this->em->persist($invoice);
                if (isset($post['qte']) && isset($post['amount']) && isset($post['vat'])&& isset($post['total'])&& isset($post['description'])){
                    for ($i=0;$i<count($post['qte']);$i++){
                        $data=array(
                            'description'=>$post['description'][$i],
                            'quantity'=>$post['qte'][$i],
                            'amount'=>$post['amount'][$i],
                            'vatAmount'=>$post['vat'][$i],
                            'totalVat'=>$post['total'][$i],
                        );
                        $invoiceLine=$this->update($data,  $this->container->get('form.factory'), InvoiceLineType::class, new InvoiceLine());
                        if (!is_array($invoice)){
                            $invoiceLine->setInvoice($invoice);
                        }
                    }
                }
                $this->em->flush();
                return $this->render('invoice/add-invoice.html.twig',['message'=>'Invoice successfully added!','errors'=>[]]);

            }
            return $this->render('invoice/add-invoice.html.twig',['message'=>'','errors'=>$invoice]);
        }
        return $this->render('invoice/add-invoice.html.twig',['message'=>'','errors'=>[]]);

    }
}
