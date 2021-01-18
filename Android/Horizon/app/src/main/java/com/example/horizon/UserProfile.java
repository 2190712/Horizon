package com.example.horizon;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class UserProfile extends AppCompatActivity {




    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_user_profile);
        new ParseTask().execute();
    }

    private class ParseTask extends AsyncTask<Void, Void, String> {

        HttpURLConnection urlConnection = null;
        BufferedReader reader = null;
        String resultJson = "";

        @Override
        protected String doInBackground(Void... params) {
            try {

                String site_url_json = "http://192.168.1.229:8888/user";
                URL url = new URL(site_url_json);

                urlConnection = (HttpURLConnection) url.openConnection();
                urlConnection.setRequestMethod("GET");
                urlConnection.connect();

                InputStream inputStream = urlConnection.getInputStream();
                StringBuffer buffer = new StringBuffer();

                reader = new BufferedReader(new InputStreamReader(inputStream));

                String line;
                while ((line = reader.readLine()) != null) {
                    buffer.append(line);
                }

                resultJson = buffer.toString();

            }catch (Exception e){
                e.printStackTrace();
            }
            return resultJson;
        }

        @Override
        protected void onPostExecute(String strJson) {
            super.onPostExecute(strJson);

            try {
                JSONArray jsonarray = new JSONArray(strJson);
                JSONObject jsonobj = jsonarray.getJSONObject(1);

                String result_json_text = jsonobj.getString("username");
                TextView textView = (TextView)findViewById(R.id.user_name);
                textView.setText(result_json_text);

                String result_json_text2 = jsonobj.getString("primeiro");
                TextView textView2 = (TextView)findViewById(R.id.user_primeiro);
                textView2.setText(result_json_text2);

                String result_json_text3 = jsonobj.getString("apelido");
                TextView textView3 = (TextView)findViewById(R.id.user_apelido);
                textView3.setText(result_json_text3);

                String result_json_text4 = jsonobj.getString("idade");
                TextView textView4 = (TextView)findViewById(R.id.user_idade);
                textView4.setText(result_json_text4);

                String result_json_text5 = jsonobj.getString("genero");
                TextView textView5 = (TextView)findViewById(R.id.user_sex);
                textView5.setText(result_json_text5);

                String result_json_text6 = jsonobj.getString("email");
                TextView textView6 = (TextView)findViewById(R.id.user_email);
                textView6.setText(result_json_text6);

                String result_json_text7 = jsonobj.getString("telemovel");
                TextView textView7 = (TextView)findViewById(R.id.user_phone);
                textView7.setText(result_json_text7);

            }catch (JSONException e){
                e.printStackTrace();
            }
        }
    }
}