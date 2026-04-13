package com.example.migueletimpamiiappdozero

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.TableLayout
import com.example.migueletimpamiiappdozero.databinding.ActivityMainBinding
import com.google.android.material.tabs.TabLayout

class MainActivity : AppCompatActivity() {
    private lateinit var binding: ActivityMainBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityMainBinding.inflate(layoutInflater)
        val view = binding.root
        setContentView(view)

        binding.tabLayoutMain.addOnTabSelectedListener(
            object:TabLayout.OnTabSelectedListener{
                override fun onTabSelected(tab: TabLayout.Tab?) {
                    when(tab?.position) {
                        0-> supportFragmentManager
                            .beginTransaction()
                            .replace(R.id.fragment_container_view, FirstFragment())
                            .commit();
                        1-> supportFragmentManager
                            .beginTransaction()
                            .replace(R.id.fragment_container_view, SecondFragment())
                            .commit();
                        2-> supportFragmentManager
                            .beginTransaction()
                            .replace(R.id.fragment_container_view, ThirdFragment())
                            .commit();
                    }
                }

                override fun onTabUnselected(tab: TabLayout.Tab?) {}

                override fun onTabReselected(tab: TabLayout.Tab?) {}

            }
        )
    }
}