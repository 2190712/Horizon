package com.example.horizon;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
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

public class Settings extends AppCompatActivity {

    Button Logout;
    Button Create;
    Button Delete;
    Button Edit;
    EditText test;
    SharedPreferences sharedPreferences;
    private Object StringRequest;
    private TextView post_response_text;

    private static final String RememberMe = "userpref";
    private static final String KEY_USER = "user";
    private static final String KEY_PASS = "pass";



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_settings);
        test = findViewById(R.id.test);

        Create=(Button)findViewById(R.id.create_atv);
        Create.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                postRequest();
            }
        });

        Delete=(Button)findViewById(R.id.delete);
        Delete.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                removerUser();
            }
        });

        Edit=(Button)findViewById(R.id.edit);
        Edit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
               EditRequest();
            }
        });

        Logout=(Button)findViewById(R.id.logout_Menu);
        Logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                sharedPreferences = getSharedPreferences(RememberMe,MODE_PRIVATE);
                SharedPreferences.Editor editor = sharedPreferences.edit();
                editor.clear();
                editor.apply();
                sharedPreferences = getSharedPreferences(RememberMe,MODE_PRIVATE);
                String name = sharedPreferences.getString(KEY_USER,null);
                String pass = sharedPreferences.getString(KEY_PASS,null);
                System.out.println("name --->" + name);

                finish();

            }
        });
    }

    private void EditRequest(){
        RequestQueue requestQueue = Volley.newRequestQueue(Settings.this);
        String url = "http://192.168.1.229:8888/atividade/atualizar/9";
        com.android.volley.toolbox.StringRequest stringRequest = new StringRequest(Request.Method.PUT, url, new Response.Listener<String>() {
                @Override
                public void onResponse(String response) {
                    post_response_text.setText(response);
                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {

                    post_response_text.setText("Data Fail");

                }
            }){
                @Override
                protected Map<String,String> getParams(){
                    Map<String,String> params = new HashMap<>();
                    params.put("titulo_atv", test.getText().toString());

                    return params;

                }
            };
        requestQueue.add(stringRequest);
        }

    private void postRequest(){
        RequestQueue requestQueue = Volley.newRequestQueue(Settings.this);
        String url = "http://192.168.1.229:8888/atividade/adicionar";
        com.android.volley.toolbox.StringRequest stringRequest = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                post_response_text.setText(response);
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                post_response_text.setText("Data Fail");

            }
        }){
            @Override
            protected Map<String,String> getParams(){
                Map<String,String> params = new HashMap<>();
                params.put("data_atv", "2022-01-07");
                params.put("start_atv", "06:25:06");
                params.put("distancia_atv", "48" );
                params.put("elevacao_atv", "153");
                params.put("velocidade_media_atv", "26");
                params.put("likes_atv", "8");
                params.put("tempo_atv", "05:04:00");
                params.put("id_equipamento_atv", "1");
                params.put("id_user_atv", "1");
                params.put("titulo_atv", "Volta Normal");

                return params;

            }
        };
        requestQueue.add(stringRequest);
    }

    public void openLogin(){
        Intent intent = new Intent(this, Login.class);
        startActivity(intent);
        finish();
    }


    private void removerUser () {
        RequestQueue requestQueue = Volley.newRequestQueue(Settings.this);
        String url = "http://192.168.1.229:8888/atividade/apagar";
        com.android.volley.toolbox.StringRequest stringRequest = new StringRequest(Request.Method.DELETE, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                post_response_text.setText(response);
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                post_response_text.setText("Data Fail");

            }
        });
        requestQueue.add(stringRequest);
    }


}