CREATE DATABASE IF NOT EXISTS blog;

USE blog;

CREATE TABLE IF NOT EXISTS posts (
  id              INT unsigned NOT NULL AUTO_INCREMENT, # Unique ID for the post
  title           VARCHAR(255) NOT NULL,                # Title of the blog post
  body            BLOB NOT NULL,                        # Body of the blog post
  created_at      DATE NOT NULL,                        # Date post was created
  PRIMARY KEY     (id)                                  # Make the id the primary key
);