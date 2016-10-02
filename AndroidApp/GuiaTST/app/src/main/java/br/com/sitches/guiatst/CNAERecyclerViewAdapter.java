package br.com.sitches.guiatst;

import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import java.util.ArrayList;

import br.com.sitches.guiatst.models.Cnae_Model;

/**
 * Created by aweiand on 30/09/16.
 */
public class CNAERecyclerViewAdapter  extends RecyclerView
        .Adapter<CNAERecyclerViewAdapter.DataObjectHolder> {
    private ArrayList<Cnae_Model> mDataset;

    public static class DataObjectHolder extends RecyclerView.ViewHolder {
        TextView num_cnae;
        TextView descricao;
        TextView id_risco;

        public DataObjectHolder(View itemView) {
            super(itemView);
            num_cnae = (TextView) itemView.findViewById(R.id.num_cnae);
            descricao = (TextView) itemView.findViewById(R.id.descricao);
            id_risco = (TextView) itemView.findViewById(R.id.id_risco);
        }
    }

    public CNAERecyclerViewAdapter(ArrayList<Cnae_Model> myDataset) {
        mDataset = myDataset;
    }

    @Override
    public DataObjectHolder onCreateViewHolder(ViewGroup parent,
                                               int viewType) {
        View view = LayoutInflater.from(parent.getContext())
                .inflate(R.layout.cnae_card_row, parent, false);

        DataObjectHolder dataObjectHolder = new DataObjectHolder(view);
        return dataObjectHolder;
    }

    @Override
    public void onBindViewHolder(DataObjectHolder holder, int position) {
        holder.num_cnae.setText(mDataset.get(position).getNum_Cnae());
        holder.descricao.setText(mDataset.get(position).getDescricao());
        holder.id_risco.setText(mDataset.get(position).getId_risco());
    }

    @Override
    public int getItemCount() {
        return mDataset.size();
    }

}

