package digiarch.online.taxicliente;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.widget.Toast;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.HashMap;
import java.util.Map;

public class PedirMovilidad extends AppCompatActivity {

    DatabaseReference mRootReferences;
    Button buttonSalirPedirMovilidad, buttonPedirMovilidad, buttonLlamar, buttonMensaje;
    EditText txtreferencia, txtdireccion, txtotros;
    RadioGroup radioGroup;
    RadioButton radioButton;
    TextView textView;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pedir_movilidad);

        buttonPedirMovilidad = findViewById(R.id.btnPedirMovilidad);
        buttonSalirPedirMovilidad = findViewById(R.id.btnSalirMovilidad);

        txtreferencia = findViewById(R.id.txtReferenciaPM);
        txtdireccion = findViewById(R.id.txtDireccionPM);
        txtotros = findViewById(R.id.txtOtrosPM);

        radioGroup = findViewById(R.id.radioGroup);
        textView = findViewById(R.id.txtEleccion);


        buttonPedirMovilidad.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                int radioId = radioGroup.getCheckedRadioButtonId();

                radioButton = findViewById(radioId);

                textView.setText("Opcion elegida: " + radioButton.getText());

                String direccion = txtdireccion.getText().toString();
                String referencia = txtreferencia.getText().toString();
                String otros = txtotros.getText().toString();
                String opt = radioButton.getText().toString();

                cargarDatosFirebaseSol1(direccion, referencia, otros, opt);
            }
        });

        mRootReferences = FirebaseDatabase.getInstance().getReference();

        mRootReferences.child("Cliente").addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {


                for(final DataSnapshot snapshot: dataSnapshot.getChildren()){

                    mRootReferences.child("Cliente").child(snapshot.getKey()).addValueEventListener(new ValueEventListener() {
                        @Override
                        public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                            userPojo user = snapshot.getValue(userPojo.class);
                            String direccion = user.getDireccion();

                            Log.e("Direccion",""+direccion);

                            Log.e("Datos: ",""+ snapshot.getValue());
                        }

                        @Override
                        public void onCancelled(@NonNull DatabaseError databaseError) {

                        }
                    });



                }
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });

        buttonSalirPedirMovilidad.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });

    }

    private void cargarDatosFirebaseSol1(String direccion, String referencia, String otros, String opcional) {
        Map<String, Object> data = new HashMap<>();
        data.put("direccion", direccion);
        data.put("referencia", referencia);
        data.put("otros", otros);
        data.put("opcional", opcional);

        mRootReferences.child("pedir_movilidad").push().setValue(data);
        Toast.makeText(this, "Datos Guardados", Toast.LENGTH_SHORT).show();

        Intent miIntent = new Intent(this, Menu.class);
        startActivity(miIntent);
    }



    public void onclick(View view) {
        finish();
    }

    public void checkOption(View v){
        int radioId = radioGroup.getCheckedRadioButtonId();

        radioButton = findViewById(radioId);
        textView.setText("Opcion elegida: " + radioButton.getText());
    }
}
