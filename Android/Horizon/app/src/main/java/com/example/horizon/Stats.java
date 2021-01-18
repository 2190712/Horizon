package com.example.horizon;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.os.Bundle;

import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;


import java.util.HashMap;
import java.util.Map;

public class Stats extends AppCompatActivity {

    //private Object StringRequest;
   // private TextView post_response_text;
    EditText title,content;
    Button Add;
    Button Back;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_stats);
        title = findViewById(R.id.titulo);
        content = findViewById(R.id.content);

        Add = (Button) findViewById(R.id.data_test);
        Add.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                MyDataBaseHelper myDB = new MyDataBaseHelper(Stats.this);
                myDB.addNote(title.getText().toString().trim(),content.getText().toString().trim());

                //postRequest();
            }
        });

        Back = (Button) findViewById(R.id.back);
        Back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent (Stats.this, MainMenu.class);
                startActivity(intent);
            }
        });

    }
}



