package br.com.sitches.guiatst.fragments;

import android.app.Activity;
import android.app.Fragment;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import java.util.ArrayList;

import br.com.sitches.guiatst.CNAERecyclerViewAdapter;
import br.com.sitches.guiatst.GerenciaBanco;
import br.com.sitches.guiatst.R;
import br.com.sitches.guiatst.models.Cnae_Model;


public class Cnae_Fragment extends Fragment {

    static GerenciaBanco gerenciaBanco = null;
    private RecyclerView mRecyclerView;
    private RecyclerView.Adapter mAdapter;
    private RecyclerView.LayoutManager mLayoutManager;

    public static Cnae_Fragment newInstance(String param1, String param2) {
        Cnae_Fragment fragment = new Cnae_Fragment();
        return fragment;
    }

    public Cnae_Fragment() {
        // Required empty public constructor
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_cnae, container, false);
        gerenciaBanco = new GerenciaBanco(view.getContext());

        ArrayList<Cnae_Model> cnae_models = gerenciaBanco.getAllCNAE();

        mRecyclerView = (RecyclerView) view.findViewById(R.id.my_f_recycler_view);
        mRecyclerView.setHasFixedSize(true);
        mLayoutManager = new LinearLayoutManager(getActivity());
        mRecyclerView.setLayoutManager(mLayoutManager);
        mAdapter = new CNAERecyclerViewAdapter(cnae_models);

        mRecyclerView.setAdapter(mAdapter);

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
