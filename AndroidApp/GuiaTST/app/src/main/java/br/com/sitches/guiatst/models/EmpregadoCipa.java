package br.com.sitches.guiatst.models;

/**
 * Created by aweiand on 20/09/16.
 */
public class EmpregadoCipa {
    private String cipa;
    private String tipo;
    private String quantidade;

    public EmpregadoCipa(){

    }

    public EmpregadoCipa(String cipa, String tipo, String quantidade){
        this.cipa = cipa;
        this.tipo = tipo;
        this.quantidade = quantidade;
    }

    public String getCipa() {
        return cipa;
    }

    public void setCipa(String cipa) {
        this.cipa = cipa;
    }

    public String getTipo() {
        return tipo == "1" ? "Titular" : "Suplente";
    }

    public void setTipo(String tipo) {
        this.tipo = tipo;
    }

    public String getQuantidade() {
        return quantidade;
    }

    public void setQuantidade(String quantidade) {
        this.quantidade = quantidade;
    }
}
