package com.example.horizon;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import org.w3c.dom.Text;

public class Settings extends AppCompatActivity {

    Button Logout;
    SharedPreferences sharedPreferences;

    private static final String RememberMe = "userpref";
    private static final String KEY_USER = "user";
    private static final String KEY_PASS = "pass";



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_settings);

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

    public void openLogin(){
        Intent intent = new Intent(this, Login.class);
        startActivity(intent);
        finish();
    }

}