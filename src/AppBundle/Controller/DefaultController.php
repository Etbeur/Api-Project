<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\NelmioApiDocBundle;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations

class DefaultController extends Controller
{

    /**
     * @Rest\View()
     * @Rest\Get("/cities")
     * @ApiDoc(
     *      statusCodes={
     *      200="Returned when successful",
     *      403="Returned when the user is not authorized to see all French's cities informations",
     *      404={
     *          "Returned when the user is not found",
     *          "Returned when something else is not found"
     *       }
     *     },
     *      resource=true,
     *      description="Return all cities of France with the Insee Code, the name, the PostalCode and the GPS coordinate",
     * )
     */
    public function getCitiesAction(Request $request)
    {
//        On récupère les donnees dans la BDD
        $cities = $this->getDoctrine()
            ->getRepository('AppBundle:CommunesFr')
            ->findAll();

//        $data = [];
//        foreach ($cities as $city)
//        {
//            $data[] =
//                [
//                    'id' => $city->getId(),
//                    'Code INSEE' => $city->getInseeNumber(),
//                    'City Name' => $city->getName(),
//                    'Postal Code' => $city->getPostalCode(),
//                    'Gps coordinate' => $city->getGpsData(),
//                ];
//        }

        return $cities;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/cities/{id}")
     * @ApiDoc(
     *      statusCodes={
     *          200="Returned when successful",
     *          403="Returned when the user is not authorized to see a French's city information",
     *          404={
     *              "Returned when the user is not found",
     *              "Returned when something else is not found"
     *         }
     *      },
     *      requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "description"="id of the city you want to see informations"
     *          }
     *      },
     *      resource=true,
     *      description="With the id you choose, returns one French's city with the Insee Code, the name, the Postal Code and the GPS coordinate.",
     *      parameters={
     *          {"name"="id", "dataType"="integer", "required"=true, "description"="city id"}
     *      }
     * )
     */
    public function getCityAction(Request $request)
    {
        $city = $this->getDoctrine()
            ->getRepository('AppBundle:CommunesFr')
            ->find($request->get('id'));

//        if ( empty($city) )
//        {
//            return new JsonResponse(
//                ['message' => 'City not found, try again'],
//                Response::HTTP_NOT_FOUND
//            );
//        }
//
//        $data = [
//            'id' => $city->getId(),
//            'city Name' => $city->getName(),
//            'Postal Code' => $city->getPostalCode()
//        ];
//
//        return new JsonResponse($data);

        return $city;
    }

}