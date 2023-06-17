<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class etudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        // $etudiant=DB::table("etudiant")
        // ->join("inscription","etudiant.mat_etud","inscription.mat_etud")
        // ->where("inscription.annee","2019-2020")
        // ->where("inscription.mat_etud",45297)
        // ->select("etudiant.*","inscription.*")
        // ->get();

        $etudiant=DB::table("etudiant")
        ->join("inscription","etudiant.mat_etud","inscription.mat_etud")
        ->join("departement","departement.code_depart","inscription.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->join("niveau","inscription.code_niv","niveau.code_niv")
        ->where("inscription.mat_etud",45297)
        ->where("inscription.annee","2019-2020")
        ->select("etudiant.mat_etud","etudiant.nom","etudiant.prenom","etudiant.date_naiss","etudiant.lieu_naiss","Adr_Etud","Tel_Etud","inscription.annee","faculte.design_facult","departement.design_depart","niveau.intit_niv")
        ->first();

        return $etudiant;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $etudiant=DB::table("etudiant")
        ->join("inscription","etudiant.mat_etud","inscription.mat_etud")
        ->join("departement","departement.code_depart","inscription.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->join("niveau","inscription.code_niv","niveau.code_niv")
        ->where("inscription.mat_etud",$request->mat_etud)
        ->where("inscription.annee",$request->annee)
        ->select("etudiant.mat_etud","etudiant.nom","etudiant.prenom","etudiant.date_naiss","etudiant.lieu_naiss","Adr_Etud","Tel_Etud","inscription.annee","faculte.design_facult","departement.design_depart","niveau.intit_niv")
        ->orderByDesc("inscription.Annee")
        ->first();

        return $etudiant;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function info_etudiant(Request $request)
    {
        $etudiant=DB::table("etudiant")
        ->join("inscription","etudiant.mat_etud","inscription.mat_etud")
        ->join("departement","departement.code_depart","inscription.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->join("niveau","inscription.code_niv","niveau.code_niv")
        ->where("inscription.mat_etud",$request->mat_etud)
        ->select("etudiant.mat_etud","etudiant.nom","etudiant.prenom","etudiant.date_naiss","etudiant.lieu_naiss","Adr_Etud","Tel_Etud","inscription.annee","faculte.design_facult","departement.design_depart","niveau.intit_niv")
        ->first();

        return $etudiant;
    }

    public function droit_inscription()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $droit_inscription=DB::table("inscription")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $droit_inscription;
    }

    public function droit_preinscription()
    {
        $candidats=DB::table("candidats")->count();

        return $candidats*5000;
    }
    public function FDSE_l1()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FDSE")
        ->where("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function FDSE_l2()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FDSE")
        ->where("code_niv","N2")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    
    public function FDSE_l3()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FDSE")
        ->where("code_niv","N3")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function FDSE_M1()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FDSE")
        ->where("code_niv","N4")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function FDSE_M2()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FDSE")
        ->where("code_niv","N5")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }


    public function FLSH_l1()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FLSH")
        ->where("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function FLSH_l2()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FLSH")
        ->where("code_niv","N2")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function FLSH_l3()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FLSH")
        ->where("code_niv","N3")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    
    public function FLSH_M1()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FLSH")
        ->where("code_niv","N4")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function FLSH_M2()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FLSH")
        ->where("code_niv","N5")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function FST_l1()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FST")
        ->where("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function FST_l2()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FST")
        ->where("code_niv","N2")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function FST_l3()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FST")
        ->where("code_niv","N3")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function FST_M1()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FST")
        ->where("code_niv","N4")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function FST_M2()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FST")
        ->where("code_niv","N5")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function FIC_l1()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FIC")
        ->where("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function FIC_l2()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FIC")
        ->where("code_niv","N2")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function FIC_l3()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FIC")
        ->where("code_niv","N3")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function FIC_M1()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FIC")
        ->where("code_niv","N4")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function FIC_M2()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","FIC")
        ->where("code_niv","N5")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function EMSP_l1()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","EMSP")
        ->where("code_niv","P1")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function EMSP_l2()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","EMSP")
        ->where("code_niv","P2")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function EMSP_l3()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","EMSP")
        ->where("code_niv","P3")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function EMSP_M1()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","EMSP")
        ->where("code_niv","N4")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function EMSP_M2()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","EMSP")
        ->where("code_niv","N5")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function IFERE_l1()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","IFERE")
        ->where("code_niv","P1")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function IFERE_l2()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","IFERE")
        ->where("code_niv","P2")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function IFERE_l3()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","IFERE")
        ->where("code_niv","P3")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function IFERE_M1()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","IFERE")
        ->where("code_niv","N4")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function IFERE_M2()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","IFERE")
        ->where("code_niv","N5")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function IUT_l1()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","IUT")
        ->where("code_niv","P1")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function IUT_l2()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","IUT")
        ->where("code_niv","P2")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function IUT_l3()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","IUT")
        ->where("code_niv","P3")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function CUP_l1()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","SP")
        ->where("code_niv","N1")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function CUP_l2()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","SP")
        ->where("code_niv","N2")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function CUP_l3()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","SP")
        ->where("code_niv","N3")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function CUP_M1()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","SP")
        ->where("code_niv","N4")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function CUP_M2()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","SP")
        ->where("code_niv","N5")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function CUM_l1()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","AUM")
        ->where("code_niv","N1")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function CUM_l2()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","AUM")
        ->where("code_niv","N2")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function CUM_l3()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","AUM")
        ->where("code_niv","N3")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function CUM_M1()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","AUM")
        ->where("code_niv","N4")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

    public function CUM_M2()
    {
        $annee=DB::table("annee")->orderByDesc("id_annee")->first();
    
        $faculte=DB::table("inscription")
        ->join("departement","inscription.code_depart","departement.code_depart")
        ->join("faculte","departement.code_facult","faculte.code_facult")
        ->where("faculte.code_facult","AUM")
        ->where("code_niv","N5")
        // ->orWhere("code_niv","N1")
        ->where("Annee",$annee->Annee)
        ->select('inscription.Mt_Regl_Inscrip')
        ->sum("inscription.Mt_Regl_Inscrip");

        return $faculte;
    }

}
