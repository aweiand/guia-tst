package br.com.sitches.guiatst;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;

import org.apache.commons.io.IOUtils;

import java.io.IOException;
import java.io.InputStream;
import java.util.ArrayList;
import java.util.List;

/**
 * Created by aweiand on 10/12/15.
 * HELP IN:: http://www.devmedia.com.br/criando-um-crud-com-android-studio-e-sqlite/32815
 */
public class GerenciaBanco extends SQLiteOpenHelper {
    private Context context;
    private static final int DATABASE_VERSION = 3;
    private static final String DATABASE_NAME = "guia_tst1.db";

    public GerenciaBanco(Context contextL) {
        super(contextL, DATABASE_NAME, null, DATABASE_VERSION);
        this.context = contextL;
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
//        Este cria a Base
        initiateDataBase(R.raw.cria_base, db);
//        Log.d("GUIA-TST", "Base Criada");
//        Este importa os dados
//        initiateDataBase(R.raw.dados, db);
//        Log.d("GUIA-TST", "Registros Inseridos na Base");
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        // This database is only a cache for online data, so its upgrade policy is
        // to simply to discard the data and start over
        db.execSQL("DROP TABLE IF EXISTS empregado_obrigatorio;");
        db.execSQL("DROP TABLE IF EXISTS grupo_cnae;");
        db.execSQL("DROP TABLE IF EXISTS grupo_cipa;");
        db.execSQL("DROP TABLE IF EXISTS cnae;");
        db.execSQL("DROP TABLE IF EXISTS grupo;");
        db.execSQL("DROP TABLE IF EXISTS empregado;");
        db.execSQL("DROP TABLE IF EXISTS observacao;");
        db.execSQL("DROP TABLE IF EXISTS intervalo;");
        db.execSQL("DROP TABLE IF EXISTS risco;");
        onCreate(db);
    }

    public void onDowngrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        onUpgrade(db, oldVersion, newVersion);
    }

    public void initiateDataBase(int arquivoDados, SQLiteDatabase db){
        InputStream inputStream = context.getResources().openRawResource(arquivoDados);

        String queries = "";
        try {
            queries = IOUtils.toString(inputStream);
        } catch (IOException e) {
            Log.d("GUIA-TST", e.toString());
            Log.d("GUIA-TST", "Algo de ruim aconteceu no create da base");
        }

        for (String query : queries.split(";")) {
            db.execSQL(query);
        }

        Log.d("GUIA-TST", "Base Criada!");

        inputStream = context.getResources().openRawResource(R.raw.dados);
        Log.d("GUIA-TST", "Carreguei os Dados");

        queries = "";
        try {
            queries = IOUtils.toString(inputStream);
        } catch (IOException e) {
            Log.d("GUIA-TST", "Algo de ruim aconteceu no insert de dados");
            Log.d("GUIA-TST", e.toString());
        }
        Log.d("GUIA-TST", "Coloquei na var Query.");

        for (String query : queries.split("#")) {
            db.execSQL(query);
        }
        Log.d("GUIA-TST", "Registros Inseridos na Base!");
    }

    public ArrayList<EmpregadoObrigatorio> getDataByCnaeFuncionario(String cnae, String funcionarios){
        SQLiteDatabase db = getWritableDatabase();
        ArrayList<EmpregadoObrigatorio> listaEmpregadoObr = new ArrayList<EmpregadoObrigatorio>();
        Cursor cursor;
        Log.d("GUIA-TST", "Cheguei Aqui");

        cursor = db.rawQuery("SELECT c.num_cnae as cnae, c.descricao as cnae_desc, eo.quantidade, " +
                                " r.risco, i.minimo, i.maximo, e.descricao ,o.observacao " +
                                " FROM empregado_obrigatorio eo " +
                                    " INNER JOIN cnae c ON (eo.id_risco = c.id_risco) " +
                                    " INNER JOIN risco r ON (c.id_risco = r.id_risco) " +
                                    " INNER JOIN intervalo i ON (eo.id_intervalo = i.id_intervalo) " +
                                    " INNER JOIN empregado e ON (eo.id_empregado = e.id_empregado) " +
                                    " LEFT OUTER JOIN observacao o ON (eo.id_observacao = o.id_observacao) " +
                                " WHERE c.num_cnae = " + cnae + " AND " +
                                    " (i.minimo <= " + funcionarios + " AND i.maximo >= "+ funcionarios + ") ", null);

        Log.d("GUIA-TST", "Agora Aqui, depois do SELECT");


        if( cursor != null ) {
            while (cursor.moveToNext()) {
                EmpregadoObrigatorio empregadoObrigatorio = new EmpregadoObrigatorio(
                        cursor.getString(cursor.getColumnIndex("cnae")),
                        cursor.getString(cursor.getColumnIndex("cnae_desc")),
                        cursor.getString(cursor.getColumnIndex("risco")),
                        cursor.getString(cursor.getColumnIndex("minimo")),
                        cursor.getString(cursor.getColumnIndex("maximo")),
                        cursor.getString(cursor.getColumnIndex("descricao")),
                        cursor.getString(cursor.getColumnIndex("observacao")),
                        cursor.getString(cursor.getColumnIndex("quantidade"))
                );

                listaEmpregadoObr.add(empregadoObrigatorio);
            }
        } else {
            Log.d("GUIA-TST", "O select retornou vazio..");
        }
        cursor.close();

        return listaEmpregadoObr;
    }

    public ArrayList<EmpregadoCipa> getDataByCnaeCipa(String cnae, String funcionarios){
        SQLiteDatabase db = getWritableDatabase();
        ArrayList<EmpregadoCipa> listaEmpregadoCipa = new ArrayList<EmpregadoCipa>();
        Cursor cursor;
        Log.d("GUIA-TST", "Cheguei Aqui");

        cursor = db.rawQuery("SELECT gc.cipa, gc.tipo, gc.quantidade " +
                " FROM grupo_cipa gc " +
                " INNER JOIN grupo_cnae gcn ON (gc.cipa = gcn.cipa) " +
                " INNER JOIN intervalo i ON (gc.id_intervalo = i.id_intervalo) " +
                " WHERE gcn.num_cnae = " + cnae + " AND " +
                " (i.minimo <= " + funcionarios + " AND i.maximo >= "+ funcionarios + ") ", null);

        Log.d("GUIA-TST", "Agora Aqui, depois do SELECT");


        if( cursor != null ) {
            while (cursor.moveToNext()) {
                EmpregadoCipa empregadoCipa = new EmpregadoCipa(
                        cursor.getString(cursor.getColumnIndex("cipa")),
                        cursor.getString(cursor.getColumnIndex("tipo")),
                        cursor.getString(cursor.getColumnIndex("quantidade"))
                );

                listaEmpregadoCipa.add(empregadoCipa);
            }
        } else {
            Log.d("GUIA-TST", "O select retornou vazio..");
        }
        cursor.close();

        return listaEmpregadoCipa;
    }

}
