package br.com.sitches.guiatst;

import android.app.Fragment;
import android.app.FragmentTransaction;
import android.os.Bundle;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    GerenciaBanco gerenciaBanco = null;
    ArrayList<EmpregadoObrigatorio> empregadoObrigatorios;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        gerenciaBanco = new GerenciaBanco(getApplicationContext());

        setContentView(R.layout.activity_main);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.setDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);

        displayView(R.id.nav_home);
    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        displayView(item.getItemId());
        return true;
    }

    public void displayView(int id) {
        Fragment fragment = new HomeFragment();
        String title = getString(R.string.app_name);

        switch (id){
            case R.id.nav_home:
                fragment = new HomeFragment();
                title = getString(R.string.app_name);
                break;

            case R.id.nav_cnae:
                fragment = new Cnae_Fragment();
                title = getString(R.string.app_name);
                break;

            case R.id.nav_sobre:
                fragment = new SobreFragment();
                title = getString(R.string.app_name);
                break;
        }

        if (fragment != null) {
            FragmentTransaction ft = getFragmentManager().beginTransaction();
            ft.replace(R.id.fragmentos, fragment);
            getSupportActionBar().setTitle(title);
            ft.commit();
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
    }

    public void BtnConsultaClick(View view) {
        EditText cnae = (EditText) findViewById(R.id.inptCnae);
        Spinner funcs = (Spinner) findViewById(R.id.spinner);

        String minimo = funcs.getSelectedItem().toString().split("-")[0];
        String maximo = funcs.getSelectedItem().toString().split("-")[1];

        empregadoObrigatorios = gerenciaBanco.getDataByCnaeFuncionario(cnae.getText().toString(), minimo, maximo);
        if (empregadoObrigatorios.size() >0) {
            Fragment fragment = new RestuladoConsulta();
            FragmentTransaction ft = getFragmentManager().beginTransaction();
            ft.replace(R.id.fragmentos, fragment);
            getSupportActionBar().setTitle("Resultado Consulta");
            ft.commit();
            DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
            drawer.closeDrawer(GravityCompat.START);
        } else {
            Toast.makeText(view.getContext(), "Nenhum resultado encontrado...", Toast.LENGTH_LONG).show();
        }
    }

    public ArrayList<EmpregadoObrigatorio> getEmpregadoObrFiltrado(){
        return empregadoObrigatorios;
    }
}
