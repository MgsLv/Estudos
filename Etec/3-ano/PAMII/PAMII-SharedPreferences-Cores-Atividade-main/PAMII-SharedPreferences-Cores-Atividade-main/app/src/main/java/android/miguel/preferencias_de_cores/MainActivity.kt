package android.miguel.preferencias_de_cores

import android.graphics.Color
import android.miguel.preferencias_de_cores.databinding.ActivityMainBinding
import android.os.Bundle
import android.view.View
import android.widget.Toast
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.google.android.material.snackbar.Snackbar

class MainActivity : AppCompatActivity() {
    lateinit var binding : ActivityMainBinding

    companion object{
        const val NOME_ARQUIVO = "arquivo.prefs.xml"
    }

    private var cor = ""

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        binding = ActivityMainBinding.inflate((layoutInflater))

        setContentView(binding.root)

        binding.btnCor1.setOnClickListener {
            cor = "#FF03DAC5"
            salvarCor(cor)
        }
        binding.btnCor2.setOnClickListener {
            cor = "#FF018786"
            salvarCor(cor)
        }
        binding.btnCor3.setOnClickListener {
            cor = "#F44336"
            salvarCor(cor)
        }
        binding.btnCor4.setOnClickListener {
            cor = "#4CAF50"
            salvarCor(cor)
        }
        binding.btnCor5.setOnClickListener {
            cor = "#FFc107"
            salvarCor(cor)
        }

    }

    override fun onResume() {
        super.onResume()

        val preferencias = getSharedPreferences(NOME_ARQUIVO, MODE_PRIVATE)
        val cor = preferencias.getString("cor", "")

        if (cor!!.isNotEmpty()) {
            binding.layoutPrincipal.setBackgroundColor(Color.parseColor(cor))
        }
    }

    private fun salvarCor(cor: String) {
        binding.layoutPrincipal.setBackgroundColor(Color.parseColor(cor))

        binding.btnTrocar.setOnClickListener {view ->
            val preferencias = getSharedPreferences(NOME_ARQUIVO, MODE_PRIVATE)
            val editor = preferencias.edit()
            editor.putString("cor", cor)
            editor.putString("nome", "Miguel")
            editor.putString("sobrenome", "Soares")
            editor.putString("idade", "16")
            editor.apply()

            snackBar(view)
        }
    }

    private fun snackBar(view: View) {
        val snackbar = Snackbar.make(view, "Cor de funco alterada com sucesso!", Snackbar.LENGTH_INDEFINITE)
        snackbar.setAction("OK") {

        }

        snackbar.setActionTextColor(Color.BLUE)
        snackbar.setBackgroundTint(Color.LTGRAY)
        snackbar.setTextColor(Color.GREEN)
        snackbar.show()
    }
}