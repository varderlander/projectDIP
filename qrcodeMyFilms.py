import qrcode

def get_qrcode(url='https://google.com', name='default'): #browser
  qr = qrcode.make(data=url)
  qr.save(stream=f'{name}.png')

  return f'Open the {name}.png'

def main():
  print(get_qrcode(url='http://d/', name='myFilms')) #host url

if __name__ == '__main__':
  main()