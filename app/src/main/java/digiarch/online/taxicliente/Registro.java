package digiarch.online.taxicliente;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.HashMap;
import java.util.Map;

public class Registro extends AppCompatActivity {

    DatabaseReference mRootReferences;
    Button buttonSubirDatosFirebase, btn2;
    EditText txtNombre, txtApellido, txtTelefono, txtEmail, txtDocumento, txtCiudad, txtPasswd1, txtPasswd2;

    private ProgressDialog progressDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registro);

        buttonSubirDatosFirebase = findViewById(R.id.btnRegistrarse);
        btn2 = findViewById(R.id.btnCancelarLogin);

        txtNombre = findViewById(R.id.txtNombre);
        txtApellido = findViewById(R.id.txtApellidos);
        txtTelefono = findViewById(R.id.txtTelefono);
        txtEmail = findViewById(R.id.txtEmailLogin);
        txtDocumento = findViewById(R.id.txtDocumento);
        txtCiudad = findViewById(R.id.txtCiudad);
        txtPasswd1 = findViewById(R.id.txtPasswd1);
        txtPasswd2 = findViewById(R.id.txtPasswd2);

        ValidarPasswd();

        mRootReferences = FirebaseDatabase.getInstance().getReference();

        mRootReferences.child("Clientes").addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {


                for(final DataSnapshot snapshot: dataSnapshot.getChildren()){

                    mRootReferences.child("Clientes").child(snapshot.getKey()).addValueEventListener(new ValueEventListener() {
                        @Override
                        public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                            //userPojo user = snapshot.getValue(userPojo.class);
                            String codCliente = snapshot.getKey().toString();

                            Log.e("Codigo Cliente: ",""+codCliente);
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

        buttonSubirDatosFirebase.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String nombre = txtNombre.getText().toString();
                String apellido = txtApellido.getText().toString();
                String telefono = txtTelefono.getText().toString();
                String email = txtEmail.getText().toString();
                String documento = txtDocumento.getText().toString();
                String ciudad = txtCiudad.getText().toString();
                String passwd = txtPasswd1.getText().toString();
                String passwd2 = txtPasswd2.getText().toString();

                if(TextUtils.isEmpty(nombre)){
                    Toast.makeText(Registro.this, "Debe Ingresar un nombre", Toast.LENGTH_SHORT).show();
                    return;
                }
                if(TextUtils.isEmpty(apellido)){
                    Toast.makeText(Registro.this, "Debe Ingresar sus Apellidos", Toast.LENGTH_SHORT).show();
                    return;
                }

                if(TextUtils.isEmpty(telefono)){
                    Toast.makeText(Registro.this, "Debe Ingresar su Numero de Telefono", Toast.LENGTH_SHORT).show();
                    return;
                }

                if(TextUtils.isEmpty(email)){
                    Toast.makeText(Registro.this, "Debe Ingresar su correo electronico", Toast.LENGTH_SHORT).show();
                    return;
                }
                if(TextUtils.isEmpty(documento)){
                    Toast.makeText(Registro.this, "Debe Ingresar su numero de documento", Toast.LENGTH_SHORT).show();
                    return;
                }
                if(TextUtils.isEmpty(ciudad)){
                    Toast.makeText(Registro.this, "Por favor indique la ciudad donde esta", Toast.LENGTH_SHORT).show();
                    return;
                }
                if(TextUtils.isEmpty(passwd)){
                    Toast.makeText(Registro.this, "Debe ingresar una contraseña", Toast.LENGTH_SHORT).show();
                    return;
                }
                if(TextUtils.isEmpty(passwd2)){
                    Toast.makeText(Registro.this, "Repita la contraseña nuevamente", Toast.LENGTH_SHORT).show();
                    return;
                }


                cargarDatosFirebase(nombre, apellido, telefono, email, documento, ciudad, passwd);

            }
        });

        btn2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
    }

    private void ValidarPasswd() {
        if(txtPasswd1.getText() == txtPasswd2.getText()){
            Toast.makeText(getApplicationContext(), "Password Iguales", Toast.LENGTH_SHORT).show();
        }else{
            Toast.makeText(getApplicationContext(), "Las Contraseñas no son iguales", Toast.LENGTH_SHORT).show();
        }
    }

    private void cargarDatosFirebase(String nombre, String apellido, String telefono, String email, String documento, String ciudad, String passwd) {
        Map<String, Object> data = new HashMap<>();
        data.put("nombre", nombre);
        data.put("apellido", apellido);
        data.put("telefono", telefono);
        data.put("email", email);
        data.put("documento", documento);
        data.put("ciudad", ciudad);
        data.put("passwd", passwd);

        mRootReferences.child("Clientes").push().setValue(data);
        Toast.makeText(Registro.this, "Datos Guardados", Toast.LENGTH_SHORT).show();

        Intent miIntent = new Intent(this, Menu.class);
        startActivity(miIntent);
    }


}
