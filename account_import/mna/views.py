import csv
from django.http import HttpResponse
from django.conf import settings
from django.db import models

from mna.models import *
from utils import UnicodeWriter

def artists(request):
    response = HttpResponse(content_type='text/plain')
    response = HttpResponse(content_type='text/csv')
    response['Content-Disposition'] = 'attachment; filename="artists.csv"'

    writer = UnicodeWriter(response)
    fieldNames = TArtist.field_names()
    writer.writerow(fieldNames)
    
    for artist in TArtist.objects.all()[:1000]:
        values = []
        for fieldName in fieldNames:
            values.append(artist.field_value(fieldName))
        writer.writerow(values)

    return response

