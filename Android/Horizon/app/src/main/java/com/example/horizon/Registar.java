package com.example.horizon;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
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

public class Registar extends AppCompatActivity {

    private Object StringRequest;
    private TextView post_response_text;
    EditText editText_user;
    EditText editText_pass;
    EditText editText_email;
    EditText editText_name;
    EditText editText_lastname;
    EditText editText_phone;
    EditText editText_age;
    EditText editText_sex;

    TextView Register;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registar);
        Register=(TextView)findViewById(R.id.Registet);
        editText_user = findViewById(R.id.user);
        editText_pass = findViewById(R.id.pass);
        editText_email = findViewById(R.id.email);
        editText_name = findViewById(R.id.email);
        editText_lastname = findViewById(R.id.email);
        editText_phone = findViewById(R.id.email);
        editText_age = findViewById(R.id.email);
        editText_sex = findViewById(R.id.email);

        Register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                postRequest();
            }
        });
    }
    private void postRequest(){
        RequestQueue requestQueue = Volley.newRequestQueue(Registar.this);
        String url = "http://192.168.1.229:8888/user/adicionar";
        com.android.volley.toolbox.StringRequest stringRequest = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
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
                params.put("username", editText_user.getText().toString());
                params.put("password", "asdsada");
                params.put("email", "test@gmail.com");
                params.put("primeiro", editText_name.getText().toString());
                params.put("apelido", editText_lastname.getText().toString());
                params.put("telemovel", "123123123");
                params.put("idade", "11");
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