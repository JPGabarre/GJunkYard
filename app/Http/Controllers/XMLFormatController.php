<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\Tipus_vehicle;
use App\Pece;
use App\User;

class XMLFormatController extends Controller
{
    public function ExportarVehiclesDades(){
        $arrayVehicles = Vehicle::all();
        $arrayTipusVehicles = Tipus_vehicle::all();
        $arrayPeces = Pece::all();

        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->startDocument();
        $xml->startElement('vehicles');
            foreach($arrayVehicles as $vehicle) {
                $xml->startElement('vehicle');
                    $xml->writeElement('id', $vehicle->id);
                    $xml->writeElement('numero_bastidor', $vehicle->bastidor);
                    $xml->writeElement('combustible', $vehicle->combustible);
                    $xml->writeElement('portes', $vehicle->portes);
                    $xml->writeElement('places', $vehicle->places);
                    $xml->writeElement('any_matriculacio', $vehicle->any_matriculacio);
                    $xml->writeElement('marca', $vehicle->tipus_vehicle->marca);
                    $xml->writeElement('model', $vehicle->tipus_vehicle->model);
                    $xml->startElement('peces');
                        $arrayPeces = Pece::where('id_vehicle',$vehicle->id)->get();
                        foreach($arrayPeces as $pece) {
                            $xml->startElement('peça');
                                $xml->writeElement('id', $pece->id);
                                $xml->writeElement('numero_referencia', $pece->referencia);
                                $xml->writeElement('nom', $pece->nom);
                                $xml->writeElement('quantitat', $pece->quantitat);
                                $xml->writeElement('preu', $pece->preu);
                            $xml->endElement();
                        }
                    $xml->endElement();
                $xml->endElement();
            }

        $xml->endElement();
        $xml->endDocument();
        $filename = now()->format('Y-m-d-H-i-s');
        header("Content-Type: text/html/force-download");
        header("Content-Disposition: attachment; filename=".$filename.".xml");


        $content = $xml->outputMemory();
        $xml = null;

        return response($content)->header('Content-Type', 'text/xml');
    }

    public function ExportarUsersDades(){
        $arrayUsers = User::all();

        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->startDocument();
        $xml->startElement('usuaris');

            foreach($arrayUsers as $user) {
                $xml->startElement('usuari');
                    $xml->writeElement('id', $user->id);
                    $xml->writeElement('dni', $user->DNI);
                    $xml->writeElement('nom', $user->nom);
                    $xml->writeElement('cognoms', $user->cognoms);
                    $xml->writeElement('telefon', $user->telefon);
                    $xml->writeElement('email', $user->email);
                    $xml->writeElement('rol', $user->rols->nom);
                $xml->endElement();
            }

        $xml->endElement();
        $xml->endDocument();
        $filename = now()->format('Y-m-d-H-i-s');
        header("Content-Type: text/html/force-download");
        header("Content-Disposition: attachment; filename=".$filename.".xml");


        $content = $xml->outputMemory();
        $xml = null;

        return response($content)->header('Content-Type', 'text/xml');
    }

}
