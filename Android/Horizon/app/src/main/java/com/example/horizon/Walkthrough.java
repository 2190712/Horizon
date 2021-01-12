package com.example.horizon;

import androidx.appcompat.app.AppCompatActivity;
import androidx.viewpager.widget.ViewPager;

import android.os.Bundle;
import android.widget.LinearLayout;

public class Walkthrough extends AppCompatActivity {

    private ViewPager mSlideViewPager;
    private LinearLayout mDotLayout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_walkthrough);

        mSlideViewPager = (ViewPager) findViewById(R.id.sliderViewPage);
        mDotLayout = (LinearLayout) findViewById(R.id.dotsLayout);
    }
}