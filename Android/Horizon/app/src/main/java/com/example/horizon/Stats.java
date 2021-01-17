package com.example.horizon;

import androidx.appcompat.app.AppCompatActivity;

import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.text.BreakIterator;
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
        

        TextView post_response_text = findViewById(R.id.get_response_data);

                test.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                       postRequest();
                    }
                });
    }
    private void postRequest(){
        RequestQueue requestQueue = Volley.newRequestQueue(Stats.this);
        String url = "http://192.168.1.229:8888/user";
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
                params.put("username","Value_username");
                params.put("password_hash","Value_password");
                params.put("email","Value_email");
                params.put("primeiro","Value_primeiro");
                params.put("apelido","Value_apelido");
                params.put("telemovel","Value_telemovel");
                params.put("idade","Value_idade");
                params.put("genero","Value_genero");
                return params;
            }

            public Map<String, String> getHeader() throws AuthFailureError{
                Map<String,String> params = new HashMap<String, String>();
                params.put("Content-type","application/json");
                return params;
            }
        };
        requestQueue.add(stringRequest);


    }
}


