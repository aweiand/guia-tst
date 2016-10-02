package br.com.sitches.guiatst.models;

import android.os.Bundle;

/**
 * Created by aweiand on 24/06/16.
 */
public class EmpregadoObrigatorio {
    private String cnae;
    private String desc_cnae;
    private String risco;
    private String intervalo_minimo;
    private String intervalo_maximo;
    private String empregado;
    private String observacao;
    private String quantidade;

    public EmpregadoObrigatorio(){

    }

    public EmpregadoObrigatorio(String cnae, String desc_cnae, String risco, String intervalo_minimo, String intervalo_maximo, String empregado, String observacao, String quantidade) {
        this.cnae = cnae;
        this.desc_cnae = desc_cnae;
        this.risco = risco;
        this.intervalo_minimo = intervalo_minimo;
        this.intervalo_maximo = intervalo_maximo;
        this.empregado = empregado;
        this.observacao = observacao;
        this.quantidade = quantidade;
    }

    public String getEmpregado() {
        return empregado;
    }

    public void setEmpregado(String empregado) {
        this.empregado = empregado;
    }

    public String getRisco() {
        return risco;
    }

    public void setRisco(String risco) {
        this.risco = risco;
    }

    public String getIntervalo_minimo() {
        return intervalo_minimo;
    }

    public void setIntervalo_minimo(String intervalo_minimo) {
        this.intervalo_minimo = intervalo_minimo;
    }

    public String getIntervalo_maximo() {
        return intervalo_maximo;
    }

    public void setIntervalo_maximo(String intervalo_maximo) {
        this.intervalo_maximo = intervalo_maximo;
    }

    public String getObservacao() {
        return observacao;
    }

    public void setObservacao(String observacao) {
        this.observacao = observacao;
    }

    public String getQuantidade() {
        return quantidade;
    }

    public void setQuantidade(String quantidade) {
        this.quantidade = quantidade;
    }

    public String getDesc_cnae() {
        return desc_cnae;
    }

    public void setDesc_cnae(String desc_cnae) {
        this.desc_cnae = desc_cnae;
    }

    public String getCnae() {
        return cnae;
    }

    public void setCnae(String cnae) {
        this.cnae = cnae;
    }
}
