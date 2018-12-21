<?php

namespace App\Controller;

use App\Entity\Area;
use App\Entity\Faction;
use App\Entity\Lore;
use App\Entity\Persona;
use App\Entity\Race;
use App\Repository\FactionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }



    //LORE
    /**
     * @Route("/Lore", name="show_lores")
     */
    public function showLore()
    {
        $em = $this->getDoctrine()->getManager();

        $lores = $em->getRepository(Lore::class)->findAll();

        return $this->render('body/lore/lore.html.twig', [
            'lores' => $lores
        ]);
    }


    /**
     * @Route("/Lore/{id}", name="show_lore_details")
     */
    public function showLoreDetails($id)
    {
        $em = $this->getDoctrine()->getManager();

        $lore = $em->getRepository(Lore::class)->findOneBy(['id' => $id]);

        if(!$lore){
            //message flash
            return $this->redirectToRoute('show_characters');
        }

        return $this->render('body/lore/lore_view.html.twig', [
            'lore' => $lore
        ]);
    }




    //PERSONA
    /**
     * @Route("/personnages", name="show_characters")
     */
    public function showCharacters()
    {
        $em = $this->getDoctrine()->getManager();

        $personnages = $em->getRepository(Persona::class)->findAll();

        return $this->render('body/persona/persona.html.twig', [
            'personnages' => $personnages
        ]);
    }


    /**
     * @Route("/personnages/{id}", name="show_one_character")
     */
    public function showOneCharacter($id)
    {
        $em = $this->getDoctrine()->getManager();

        $personnage = $em->getRepository(Persona::class)->findOneBy(['id' => $id]);

        if(!$personnage){
            //message flash
            return $this->redirectToRoute('show_characters');
        }

        return $this->render('body/persona/persona_view.html.twig', [
            'personnage' => $personnage
        ]);
    }

    //RACES
    /**
     * @Route("/races", name="show_races")
     */
    public function showRaces()
    {
        $em = $this->getDoctrine()->getManager();

        $races = $em->getRepository(Race::class)->findAll();

        return $this->render('body/race/race.html.twig', [
            'races' => $races
        ]);
    }


    /**
     * @Route("/races/{id}", name="show_one_race")
     */
    public function showOneRace($id)
    {
        $em = $this->getDoctrine()->getManager();

        $race = $em->getRepository(Race::class)->findOneBy(['id' => $id]);

        if(!$race){
            //message flash
            return $this->redirectToRoute('show_races');
        }

        return $this->render('body/race/race_view.html.twig', [
            'race' => $race
        ]);
    }


    //FACTIONS
    /**
     * @Route("/factions", name="show_factions")
     */
    public function showFactions()
    {
        $em = $this->getDoctrine()->getManager();

        $factions = $em->getRepository(Faction::class)->findAll();

        return $this->render('body/faction/faction.html.twig', [
            'factions' => $factions
        ]);
    }


    /**
     * @Route("/factions/{id}", name="show_one_faction")
     */
    public function showOneFaction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $faction = $em->getRepository(Faction::class)->findOneBy(['id' => $id]);

        if(!$faction){
            //message flash
            return $this->redirectToRoute('show_factions');
        }

        return $this->render('body/faction/faction_view.html.twig', [
            'faction' => $faction
        ]);
    }

    //AREA
    /**
     * @Route("/zones", name="show_areas")
     */
    public function showAreas()
    {
        $em = $this->getDoctrine()->getManager();

        $areas = $em->getRepository(Area::class)->findAll();

        return $this->render('body/area/area.html.twig', [
            'areas' => $areas
        ]);
    }


    /**
     * @Route("/zones/{id}", name="show_one_area")
     */
    public function showOneArea($id)
    {
        $em = $this->getDoctrine()->getManager();

        $area = $em->getRepository(Area::class)->findOneBy(['id' => $id]);

        if(!$area){
            //message flash
            return $this->redirectToRoute('show_$areas');
        }

        return $this->render('body/area/area_view.html.twig', [
            'area' => $area
        ]);
    }
}
