package digiarch.online.taxicliente;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class Menu extends AppCompatActivity {

    Button buttonPedirMovilidad, buttonDelivery, buttonReservMovil, buttonConsult, buttonEmergen;
    TextView infoText;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu);

        infoText = findViewById(R.id.infoTextView);

        if(getIntent().getExtras() != null){
            for (String key: getIntent().getExtras().keySet()){
             String value = getIntent().getExtras().getString(key);
             infoText.append("\n" + key +": "+ value);
            }
        }

        buttonPedirMovilidad = findViewById(R.id.btnPedirMovilidad);
        buttonDelivery = findViewById(R.id.btnPedirDelivery);
        buttonReservMovil = findViewById(R.id.btnReservaMovilidad);
        buttonConsult = findViewById(R.id.btnConsultas);
        buttonEmergen = findViewById(R.id.btnEmergencias);

        buttonPedirMovilidad.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent myintent = new Intent(Menu.this, PedirMovilidad.class);
                startActivity(myintent);
            }
        });

        buttonDelivery.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent myintent = new Intent(Menu.this, Delivery.class);
                startActivity(myintent);

            }
        });

        buttonReservMovil.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent myintent = new Intent(Menu.this, ReservaMovilidad.class);
                startActivity(myintent);

            }
        });

        buttonConsult.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent myintent = new Intent(Menu.this, Consultas.class);
                startActivity(myintent);
            }
        });

        buttonEmergen.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent myintent = new Intent(Menu.this, Emergencias.class);
                startActivity(myintent);
            }
        });
    }
}
