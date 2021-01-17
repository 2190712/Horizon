package com.example.horizon;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.os.Handler;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class Login extends AppCompatActivity {

    TextView Login;
    Button Menu;
    CheckBox Remember;
    EditText editText_user,editText_pass;
    boolean doubleBackToExitPressedOnce = false;
    SharedPreferences sharedPreferences;

    private static final String RememberMe = "userpref";
    private static final String KEY_USER = "user";
    private static final String KEY_PASS = "pass";

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

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        editText_user = findViewById(R.id.textLogin);
        editText_pass = findViewById(R.id.textPass);
        Menu=(Button)findViewById(R.id.login_Menu);
        Remember = (CheckBox)findViewById(R.id.remember_me);

        sharedPreferences = getSharedPreferences(RememberMe,MODE_PRIVATE);

        String name = sharedPreferences.getString(KEY_USER, null);

        if(name !=null){
            openMenu();
        }

        Menu.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                    if(Remember.isChecked()){
                        SharedPreferences.Editor editor = sharedPreferences.edit();
                        editor.putString(KEY_USER,editText_user.getText().toString());
                        editor.putString(KEY_PASS,editText_pass.getText().toString());
                        editor.apply();
                        Toast.makeText(Login.this, "Login Success", Toast.LENGTH_SHORT).show();
                        openMenu();
                    } else {
                        openMenu();
                        Toast.makeText(Login.this, "Login Success", Toast.LENGTH_SHORT).show();
                    }
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
        Intent intent = new Intent(this, Walkthrough.class);
        startActivity(intent);
        finish();
    }

    public void openRegister(){
        Intent intent = new Intent(this, Registar.class);
        startActivity(intent);
    }
}