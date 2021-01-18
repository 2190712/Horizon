package com.example.horizon;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.ClipData;
import android.content.Intent;
import android.database.Cursor;
import android.os.Bundle;
import android.os.Handler;
import android.view.View;
import android.widget.ImageView;
import android.widget.Toast;

import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.google.android.material.floatingactionbutton.FloatingActionButton;

import java.util.ArrayList;

public class MainMenu extends AppCompatActivity {

    MyDataBaseHelper myDB;
    ArrayList<String> note_id, note_title, note_content;
    CustomAdaptar customAdaptar;

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
                openStats();
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
                openSettings();
            }
        });

        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        RecyclerView recyclerView = (RecyclerView) findViewById(R.id.notes);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent (MainMenu.this, Stats.class);
                startActivity(intent);
            }
        });

        myDB = new MyDataBaseHelper(MainMenu.this);
        note_id = new ArrayList<>();
        note_title = new ArrayList<>();
        note_content = new ArrayList<>();

        storeDataInArrays();

        customAdaptar = new CustomAdaptar(MainMenu.this, note_id, note_title, note_content);
        recyclerView.setAdapter(customAdaptar);
        recyclerView.setLayoutManager(new LinearLayoutManager(MainMenu.this));

    }

    void storeDataInArrays(){
        Cursor cursor = myDB.readAllData();
        if(cursor.getCount() == 0){
            Toast.makeText(this,"No data!", Toast.LENGTH_SHORT).show();
        }else{
            while (cursor.moveToNext()){
                note_id.add(cursor.getString(0));
                note_title.add(cursor.getString(1));
                note_content.add(cursor.getString(2));
            }
        }
    }




    private void openMaps() {
        Intent intent = new Intent(this, MapaLocalizacao.class);
        startActivity(intent);
        finish();
    }

    private void openPerfil() {
        Intent intent = new Intent(this, UserProfile.class);
        startActivity(intent);
        finish();
    }

    private void openSettings() {
        Intent intent = new Intent(this, Settings.class);
        startActivity(intent);
        finish();
    }
    private void openStats() {
        Intent intent = new Intent(this, Stats.class);
        startActivity(intent);
        finish();
    }
}