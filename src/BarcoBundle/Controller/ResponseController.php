<?php

namespace BarcoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Request;
use BarcoBundle\Entity\Barco;
use BarcoBundle\Form\BarcoType;

class ResponseController extends Controller
{
  public function getBarcoAction($idBarco)
  {

    //Buscamos el barco con su id
    $repository = $this->getDoctrine()->getRepository('BarcoBundle:Barco');
    $barco = $repository->find($idBarco);

    $encoders = array(new JsonEncoder());
    $normalizers = array(new ObjectNormalizer());
    //Creamos un objeto serializer con en el encoder creado
    $serializer = new Serializer($normalizers, $encoders);


    if (empty($barco)) {
      $jsonContent = $serializer->serialize(array('code' => 400,'message' => "No existe el usuario"), 'json');
      $response = JsonResponse::fromJsonString($jsonContent);
    } else {
      //Serializamos el objeto barco
      $jsonContent = $serializer->serialize($barco, 'json');
      //Creamos una JsonResponse con el objeto que hemos serializado
      $response = JsonResponse::fromJsonString($jsonContent);
    }


      return $response;
  }

  public function postBarcoAction(Request $request)
  {

    $encoders = array(new JsonEncoder());
    $normalizers = array(new ObjectNormalizer());
    $serializer = new Serializer($normalizers, $encoders);
    $response;

    $barco = new Barco();
    //recogemos los parametros
    $barco->setParameters($request);

    //Si todos los campos son correctos se añadira y se devolvera el objeto añadido. Si es erroneo se devolvera un mensaje de error
    if ($barco->checkParameters()) {

      $em = $this->getDoctrine()->getManager();
      $em->persist($barco);
      $em->flush();

      $jsonContent = $serializer->serialize($barco, 'json');
      $response = JsonResponse::fromJsonString($jsonContent);
    } else {
      $jsonContent = $serializer->serialize(array('code' => 400,'message' => "Ninguno de los atributos puede estar vacio"), 'json');
      $response = JsonResponse::fromJsonString($jsonContent);
    }

      return $response;
  }

  public function putBarcoAction(Request $request, $idBarco)
  {
    $data = json_decode($request->getContent());
    var_dump($data);
    var_dump($request->query->all());
    //Buscamos el barco por su id
    $repository = $this->getDoctrine()->getRepository('BarcoBundle:Barco');
    $barco = $repository->find($idBarco);

    $encoders = array(new JsonEncoder());
    $normalizers = array(new ObjectNormalizer());
    $serializer = new Serializer($normalizers, $encoders);
    $response;

    //recogemos los parametros
    $barco->setParameters($request);
    //Si todos los campos son correctos se añadira y se devolvera el objeto actualizado. Si es erroneo se devolvera un mensaje de error
    if ($barco->checkParameters()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($barco);
      $em->flush();

      $jsonContent = $serializer->serialize($barco, 'json');
      $response = JsonResponse::fromJsonString($jsonContent);
    } else {
      $jsonContent = $serializer->serialize(array('code' => 400,'message' => "Ninguno de los atributos puede estar vacio"), 'json');
      $response = JsonResponse::fromJsonString($jsonContent);
    }

      return $response;
  }

  public function deleteBarcoAction($idBarco)
  {
    //Buscamos el barco
    $em = $this->getDoctrine()->getManager();
    $barco = $em->getRepository(Barco::Class)->find($idBarco);

    $encoders = array(new JsonEncoder());
    $normalizers = array(new ObjectNormalizer());
    $serializer = new Serializer($normalizers, $encoders);

    //Comprobamos si el usuario existe
    if (empty($barco)) {
      $jsonContent = $serializer->serialize(array('code' => 400,'message' => "No existe el usuario"), 'json');
      $response = JsonResponse::fromJsonString($jsonContent);
    } else {
      $em->remove($barco);
      $em->flush();
      $jsonContent = $serializer->serialize(array('code' => 200,'message' => "Eliminado con exito"), 'json');
      $response = JsonResponse::fromJsonString($jsonContent);
    }

      return $response;
  }
}
