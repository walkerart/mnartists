# mnartists.org data migration tool

## Setup

### Python virtual environment

    virtualenv mna_env
    . ./mna_env/bin/activate
    pip install -r requirements.txt

### Database

Get a pg_dump file from Nate and host it somewhere. The hosting info goes in local_settings.py:

### Create local_settings.py

    DATABASES = {
        'default': {
            'ENGINE': 'django.db.backends.postgresql_psycopg2', # Add 'postgresql_psycopg2', 'postgresql', 'mysql', 'sqlite3' or 'oracle'.
            'NAME': 'username',                      # Or path to database file if using sqlite3.
            'USER': '',                      # Not used with sqlite3.
            'PASSWORD': '',                  # Not used with sqlite3.
            'HOST': 'hostname',                      # Set to empty string for localhost. Not used with sqlite3.
            'PORT': '',                      # Set to empty string for default. Not used with sqlite3.
        }
    }

## Run it

    ./manage.py runserver # http://localhost:8100/artists.csv is all that works so far
    ./manage.py shell_plus # Allows inspecting models


