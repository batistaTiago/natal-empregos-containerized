<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class VagaEmpregoBeneficio extends Model
{
    protected $table = 'vaga_emprego_beneficio';

    protected $fillable = ['vaga_emprego_id' , 'beneficio_id'];

    public static function getAllByVagaId($vagaId)
    {
        $allBeneficios = self::where('vaga_emprego_id', $vagaId)->get();

        return $allBeneficios;
    }

    public static function clearVagaBeneficios($vagaEmpregoId){

        $queryBase = self::where('vaga_emprego_id' , $vagaEmpregoId);
        $qtd = $queryBase->count();
        $qtdDeletados = $queryBase->delete();

        return $qtd == $qtdDeletados;

        
    }

    public static function createNewVagaBeneficios($vagaEmpregoId , $newParams)
    {   
        $qtdCreated = 0;
        
        $qtdParams = count($newParams);
        foreach ($newParams as $key =>$param){
            $queryBase = self::create(['vaga_emprego_id' => $vagaEmpregoId , 'beneficio_id' => $param]);
            if(isset($queryBase)){
                $qtdCreated = $qtdCreated + 1;
            }
        }
        return $qtdCreated == $qtdParams;
    }
}
