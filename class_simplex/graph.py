from matplotlib import pyplot as plt
from pylab import *

# read lines from txt file
coords_file = open('coords.txt', 'r') 
Lines = coords_file.readlines()

def func(x, y):
    op = np.sqrt(x**2 + y**2)
    bp = np.sqrt(x**2 + (y-1)**2)
    cp = np.sqrt((x-2)**2 + (y-1)**2)
    a = (op - 0.5)**2 + 2 * (bp - 0.5)**2 + 3 * (cp - 0.5)**2
    return round(a, 3)

def func1(x, y):
    a = ((x**2) + (3*(y**3)) - y)
    
    return  round(a,5)
     

def line_to_array(line):
    try:
        line = line.strip()
        coords = line.split(",")
        coords = [float(i) for i in coords]
        x = [coords[0], coords[2], coords[4]]
        y = [coords[1], coords[3], coords[5]]
        error = coords[6]
        return x, y, error
    except :
        # if reached to the end of file
        return False, False, False
    

def draw_lines(x,y):
    k = [0, 0, 1]
    m = [1, 2, 2]
    for i, j in zip(k, m):
        x1, x2 = x[i], x[j]
        y1, y2 = y[i], y[j]
        plt.plot([x1, x2], [y1, y2], linewidth=0.5, color='k')


# prepare plot
fig = plt.figure(figsize=(6, 6))
plt.xlim(0, 2)
plt.ylim(0, 2)
plt.grid(linestyle='-', linewidth=0.5, alpha=0.2)
plt.ion()

# figtext(.5,.8,'Foo Bar', fontsize=12, ha='center')

counter = 1
for line in Lines: 
    # convert lines to coords
    x, y, error = line_to_array(line)

    # if reached to the end of file then break
    if not x : break

    # update plot title
    plt.suptitle('İterasyon: ' + str(counter), fontsize=18)
    
    # update a, b, c and error values
    plt.title('a: ' + str(func(x[0], y[0])) + ' b: ' + str(func(x[1], y[1])) + ' c: ' + str(func(x[2], y[2])) + '            Error: ' + str(error))

    # draw lines
    draw_lines(x, y)

    # draw dots
    plt.scatter(x, y, color='r')
    
    # wait for 2 seconds
    plt.pause(0.1)

    # just a counter to update plot title
    counter += 1


# wait for 100000 seconds
plt.pause(100000)