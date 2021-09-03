<?php

namespace App\Validator;

use App\Service\clienteHttp;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UrlaccesibleValidator extends ConstraintValidator
{

    private $clienteHttp;
    
    public function __construct(clienteHttp $clienteHttp)
    {
        $this->clienteHttp = $clienteHttp;
    }

    public function validate($value, Constraint $constraint)
    {
        if (null === $value || '' === $value) {
            return;
        }

        $codigoEstado = $this->clienteHttp->obtenerCodigoUrl($value);

        if($codigoEstado === null){
            $codigoEstado = 'Error';
        }

        //si el codigo es distinto de 200 entonces me añades la constraint
        if(200 !== $codigoEstado){
            // TODO: implement the validation here
            //esto lo que hace es modificar el valor de urlaccesible donde pone código por este valor de aqui
            $this->context->buildViolation($constraint->message)
            ->setParameter('{{ codigo }}', $codigoEstado) 
            ->addViolation();
        }

        
    }
}
