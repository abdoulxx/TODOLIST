CREATE TABLE tache (
    id SERIAL PRIMARY KEY,
    description TEXT NOT NULL,
    status BOOLEAN DEFAULT FALSE
);
