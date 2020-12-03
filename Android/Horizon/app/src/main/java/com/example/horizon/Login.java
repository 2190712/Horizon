package com.example.horizon;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class Login extends AppCompatActivity {

    TextView Login;
    Button Menu;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Menu=(Button)findViewById(R.id.login_Menu);
        Menu.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openMenu();
            }
        });

        Login=(TextView)findViewById(R.id.login_next);
        Login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openRegister();
            }

        });
    }
    public void openMenu(){
        Intent intent = new Intent(this, MapsActivity.class);
        startActivity(intent);
    }

    public void openRegister(){
        Intent intent = new Intent(this, Registar.class);
        startActivity(intent);
    }
}