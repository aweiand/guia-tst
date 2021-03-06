package br.com.sitches.guiatst.fragments;

import android.app.Activity;
import android.app.Fragment;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.LinearLayout;
import android.widget.TextView;

import java.util.ArrayList;

import br.com.sitches.guiatst.MainActivity;
import br.com.sitches.guiatst.R;
import br.com.sitches.guiatst.models.EmpregadoCipa;
import br.com.sitches.guiatst.models.EmpregadoObrigatorio;


public class RestuladoConsulta extends Fragment {

    public ArrayList<EmpregadoObrigatorio> empregadoObrigatorios;
    public ArrayList<EmpregadoCipa> empregadoCipas;

    public static RestuladoConsulta newInstance(ArrayList<EmpregadoObrigatorio> empregadoObrigatorios) {
        RestuladoConsulta fragment = new RestuladoConsulta();
        return fragment;
    }

    public RestuladoConsulta() {
        // Required empty public constructor
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        View view = inflater.inflate(R.layout.fragment_restulado_consulta, container, false);

        MainActivity mainActivity = (MainActivity) getActivity();
        empregadoObrigatorios = mainActivity.getEmpregadoObrFiltrado();
        empregadoCipas = mainActivity.getEmpregadoCipas();

        TextView txt_cnae = (TextView) view.findViewById(R.id.txt_cnae);
        txt_cnae.setText(empregadoObrigatorios.get(0).getCnae());

        TextView txt_risco = (TextView) view.findViewById(R.id.txt_risco);
        txt_risco.setText(empregadoObrigatorios.get(0).getRisco());

        TextView txt_cnae_desc = (TextView) view.findViewById(R.id.txt_desc_cnae);
        txt_cnae_desc.setText(empregadoObrigatorios.get(0).getDesc_cnae());

        LinearLayout GridEmpregados = (LinearLayout) view.findViewById(R.id.GridEmpregados);
        for (EmpregadoObrigatorio empregado: empregadoObrigatorios) {
            TextView emp1 = new TextView(mainActivity);
            emp1.setText(empregado.getEmpregado() + " Com " + empregado.getQuantidade() + " Empregados");
            emp1.setLayoutParams(new ViewGroup.LayoutParams(ViewGroup.LayoutParams.WRAP_CONTENT, ViewGroup.LayoutParams.WRAP_CONTENT));
            GridEmpregados.addView(emp1);
        }

        for (EmpregadoCipa empregadoCi: empregadoCipas) {
            TextView emp1 = new TextView(mainActivity);
            emp1.setText(empregadoCi.getTipo()  + empregadoCi.getQuantidade() + " Empregados");
            emp1.setLayoutParams(new ViewGroup.LayoutParams(ViewGroup.LayoutParams.WRAP_CONTENT, ViewGroup.LayoutParams.WRAP_CONTENT));
            GridEmpregados.addView(emp1);
        }

        return view;
    }

    @Override
    public void onAttach(Activity activity) {
        super.onAttach(activity);
    }

    @Override
    public void onDetach() {
        super.onDetach();
    }
}
