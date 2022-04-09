<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class BaseController extends AbstractController{
    protected $em;
    protected $validator;
    public function __construct(EntityManagerInterface $em,ValidatorInterface $validator)
    {
        $this->em=$em;
        $this->validator=$validator;
    }

    public function update($post, $formFactory, $entityType, $entity) {
        try {
            $formEntity = $formFactory->create($entityType, $entity);
            $formEntity->submit($post);
            $errors=$this->validator->validate($entity);
            $errorsMsg=$this->handleErrors($errors);
            if(is_array($errorsMsg)){
                return $errorsMsg;
            }
            $this->em->persist($entity);
            return $entity;
        } catch (\Exception $e) {
            return array('message'=>'Error during treatment. Please try again!');
        }
    }
    protected function handleErrors($errors){
        if($errors->count()){
            for ($i=0;$i<$errors->count();$i++){
                $tabError[]= array("message"=>$errors->get($i)->getMessage());
            }
            return $tabError;
        }
        return true;
    }
}
