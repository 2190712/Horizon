package com.example.horizon;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;

import android.view.View;
import android.widget.Button;
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

    private Object StringRequest;
    private TextView post_response_text;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_stats);
        Button test = findViewById(R.id.data_test);

                test.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                       postRequest();
                    }
                });
    }
    private void postRequest(){
        RequestQueue requestQueue = Volley.newRequestQueue(Stats.this);
        String url = "http://192.168.1.229:8888/user/adicionar";
        StringRequest stringRequest = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                post_response_text.setText("Post Data : " + response);
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                post_response_text.setText("Post Data Fail ");

            }
        }){
            @Override
            protected Map<String,String> getParams(){
                Map<String,String> params = new HashMap<>();
                params.put("username", "asdasfdsad");
                params.put("password", "asdsadasd");
                params.put("email", "qeqe.9@gmail.com");
                params.put("primeiro", "qwe");
                params.put("apelido", "qweqweq");
                params.put("telemovel", "123685479");
                params.put("idade", "28");
                params.put("genero", "masculino");
                params.put("distancia_total", "0");
                params.put("n_volta_total", "0");
                params.put("ganho_elevacao", "0");
                params.put("maior_volta", "0");
                params.put("n_corridas", "0");
                params.put("tempo_total", "0");
                return params;

            }
        };
        requestQueue.add(stringRequest);
    }

}


