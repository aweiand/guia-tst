package br.com.sitches.guiatst;

import android.app.Activity;
import android.app.Fragment;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;
import java.util.jar.Manifest;


public class RestuladoConsulta extends Fragment {

    public ArrayList<EmpregadoObrigatorio> empregadoObrigatorios;
    public String teste;

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

        TextView txt_cnae = (TextView) view.findViewById(R.id.txt_cnae);
        txt_cnae.setText(empregadoObrigatorios.get(0).getCnae());

        TextView txt_risco = (TextView) view.findViewById(R.id.txt_risco);
        txt_risco.setText(empregadoObrigatorios.get(0).getRisco());

        TextView txt_cnae_desc = (TextView) view.findViewById(R.id.txt_desc_cnae);
        txt_cnae_desc.setText(empregadoObrigatorios.get(0).getDesc_cnae());

//        TODO criar textos dinamicamente de acordo com o resultado
        LinearLayout GridEmpregados = (LinearLayout) view.findViewById(R.id.GridEmpregados);
        for (EmpregadoObrigatorio empregado: empregadoObrigatorios) {
            TextView emp1 = new TextView(mainActivity);
            emp1.setText(empregado.getEmpregado() + " Com " + empregado.getQuantidade() + " Empregados");
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
