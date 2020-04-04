<?php
namespace App\Controller;

use App\Entity\Contatto;
use App\Form\ContattoForm;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContattoController extends AbstractController{
 
 public function visualizzaContatto(Request $request){
    $session=$this->get("session");
    $storico_richieste = $session->get("storico");

    if($storico_richieste==null)
        $storico_richieste=[];
    $entity = new Contatto();
    $form = $this->createForm(ContattoForm::class, $entity);
 
    $form->handleRequest($request);
    $contatto_compilato=null;
    $messaggio_conferma="Sarai ricontattato a breve";
    $mostra_messaggio=false;

    if($form->isSubmitted() && $form->isValid()){
        $contatto_compilato=$form->getData();
        $mostra_messaggio=true;
        
        array_push($storico_richieste,$contatto_compilato);
        $session->set("storico",$storico_richieste);
    }
    
    $template = 'contatto.html.twig';
    return $this->render($template, [
    'form' => $form->createView(), //passo il form creato al template
    'mostra' => $mostra_messaggio,
    'messaggio_conferma' => $messaggio_conferma,
    'info' =>$contatto_compilato,
    'contatore'=> count($storico_richieste),
    ]);
    }
    
    public function gestioneContatti(Request $request){
        $session=$this->get("session");
        $storico_richieste = $session->get("storico");
        $template = 'gestione-contatti.html.twig';
        return $this->render($template,['richieste'=> $storico_richieste]);
    }

    public function editContatto(Request $request){
        $id=$request->query->get('id');
        $session=$this->get("session");
        $storico_richieste = $session->get("storico");

        $entity=isset($storico_richieste[$id]) ? $storico_richieste[$id]: new Contatto() ;

        $form = $this->createForm(ContattoForm::class, $entity);
        $form->handleRequest($request);


        $template='edit-contatto.html.twig';
        return $this->render($template,[
            'form'=> $form->createView(),
        ]);
    }
}