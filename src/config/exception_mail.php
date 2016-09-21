<?php

return [
    'enable'=>true,
    /*to email*/
    'email'=>'chqssqll@gmail.com',
    /*to name*/,
    'name'=>'Exception Email',
    'subject'=>'Exception Email Subject',
    /*some of you want to ignore exception*/
    'ignore'=>[
      Symfony\Component\HttpKernel\Exception\NotFoundHttpException,
    ],
];
