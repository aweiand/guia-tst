package br.com.sitches.guiatst.models;

import org.w3c.dom.Text;

/**
 * Created by aweiand on 30/09/16.
 */
public class Cnae_Model {
    private String num_cnae;
    private String descricao;
    private String id_risco;

    public Cnae_Model(String num_cnae, String descricao, String id_risco){
        this.num_cnae = num_cnae;
        this.descricao = descricao;
        this.id_risco = id_risco;
    }

    public String getNum_Cnae() {
        return num_cnae;
    }

    public void setNum_Cnae(String num_cnae) {
        this.num_cnae = num_cnae;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }

    public String getId_risco() {
        return id_risco;
    }

    public void setId_risco(String id_risco) {
        this.id_risco = id_risco;
    }
}
