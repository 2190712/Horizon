package com.example.horizon;

import androidx.appcompat.app.AppCompatActivity;

import android.content.ClipData;
import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.view.View;
import android.widget.ImageView;
import android.widget.Toast;

import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.google.android.material.floatingactionbutton.FloatingActionButton;

public class MainMenu extends AppCompatActivity {

    boolean doubleBackToExitPressedOnce = false;

    @Override
    public void onBackPressed() {
        if (doubleBackToExitPressedOnce) {
            super.onBackPressed();
            return;
        }

        this.doubleBackToExitPressedOnce = true;
        Toast.makeText(this, "Please click BACK again to exit", Toast.LENGTH_SHORT).show();

        new Handler().postDelayed(new Runnable() {

            @Override
            public void run() {
                doubleBackToExitPressedOnce=false;
            }
        }, 2000);
    }

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main_menu);

        ImageView img = (ImageView) findViewById(R.id.imagemap);
        img.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                openMaps();
            }
        });

        ImageView img2 = (ImageView) findViewById(R.id.imagestats);
        img2.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
            }
        });

        ImageView img3 = (ImageView) findViewById(R.id.imagesperfil);
        img3.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                openPerfil();
            }
        });

        ImageView img4 = (ImageView) findViewById(R.id.imagesdefeniçoes);
        img4.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {

            }
        });

        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

            }
        });

    }




    private void openMaps() {
        Intent intent = new Intent(this, MapaLocalizacao.class);
        startActivity(intent);
    }

    private void openPerfil() {
        Intent intent = new Intent(this, UserProfile.class);
        startActivity(intent);
    }

}