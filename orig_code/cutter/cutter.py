#!/usr/bin/python
from sys import argv
from PIL import Image
import zbar
import inspect

if len(argv) < 2: exit(1)

# create a reader
scanner = zbar.ImageScanner()

# configure the reader
scanner.parse_config('enable')

# obtain image data
pil = Image.open(argv[1]).convert('L')
width, height = pil.size
raw = pil.tobytes()

# wrap image data
image = zbar.Image(width, height, 'Y800', raw)

# scan the image for barcodes
scanner.scan(image)

# Calcula el centroide de la imagen para usarse de referencia para el corte.
def centroid(locations):
    x_avg = 0
    y_avg = 0
    for loc in locations:
        x_avg += loc[0]
        y_avg += loc[1]
    
    x_avg = x_avg/len(locations)
    y_avg = y_avg/len(locations)

    return (x_avg, y_avg)

# extract results
for symbol in image:
    # do something useful with results
    #print 'decoded', symbol.type, 'symbol', '"%s"' % symbol.data
    print str(centroid(symbol.location))

# clean up
del(image)
