<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VagaEmprego extends Model
{
    protected $table = 'vaga_emprego';

    public function regime()
    {
        return $this->belongsTo(RegimeContratacao::class, "regime_contratacao_id");
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function beneficios()
    {
        return $this->belongsToMany(Beneficio::class, VagaEmpregoBeneficio::class)->withPivot('valor')->as('detalhes');
    }
}
