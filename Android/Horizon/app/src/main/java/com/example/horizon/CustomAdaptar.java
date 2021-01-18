package com.example.horizon;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;

public class CustomAdaptar extends RecyclerView.Adapter<CustomAdaptar.MyViewHolder> {

    private Context context;
    private ArrayList note_id, note_title, note_content;

    CustomAdaptar(Context context, ArrayList note_id, ArrayList note_title, ArrayList note_content){
        this.context = context;
        this.note_id = note_id;
        this.note_title = note_title;
        this.note_content = note_content;

    }
    @NonNull
    @Override
    public MyViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(context);
        View view = inflater.inflate(R.layout.my_note, parent, false);
        return new MyViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull MyViewHolder holder, int position) {
        holder.note_id_txt.setText(String.valueOf(note_id.get(position)));
        holder.note_title_txt.setText(String.valueOf(note_title.get(position)));
        holder.note_content_txt.setText(String.valueOf(note_content.get(position)));

    }

    @Override
    public int getItemCount() {
        return note_id.size();
    }

    public class MyViewHolder extends RecyclerView.ViewHolder{

        TextView note_id_txt, note_title_txt, note_content_txt;

        public MyViewHolder(@NonNull View itemView) {
            super(itemView);
            note_id_txt = itemView.findViewById(R.id.textView);
            note_title_txt = itemView.findViewById(R.id.textView2);
            note_content_txt = itemView.findViewById(R.id.textView3);
        }
    }
}
