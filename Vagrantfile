Vagrant.configure('2') do |config|

  config.vm.box = 'bento/fedora-26'
  config.vm.box_version = '201710.25.0'

  if Vagrant.has_plugin?('vagrant-proxyconf')
    config.proxy.http     = 'http://192.168.1.1:3128/'
    config.proxy.https    = 'http://192.168.1.1:3128/'
    config.proxy.no_proxy = 'localhost,127.0.0.1,.local'
  end

  config.vm.provider 'virtualbox' do |vb|
    vb.cpus = 1
    vb.memory = '512'
  end

  config.ssh.insert_key = false

  config.vm.provision :file, source: '~/.vagrant.d/insecure_private_key',  destination: '~/.ssh/id_rsa'
  config.vm.provision :file, source: '.development/config/ssh_config', destination: '~/.ssh/config'
  config.vm.provision :shell, inline: 'chmod 600 ~/.ssh/*', privileged: false

  config.vm.provision :shell, path: '.development/bin/install-packages.sh'

  config.vm.define 'sw' do |sw|
    sw.vm.hostname = 'swstarship-dev'
    sw.vm.network :private_network, ip: '192.168.50.25'

    sw.vm.provision :shell, path: '.development/bin/install-composer.sh'
    sw.vm.provision :shell, path: '.development/bin/install-phpunit.sh'

    sw.vm.synced_folder './', '/usr/local/swstarship'

    sw.vm.provision :shell, inline: 'chown vagrant.vagrant -R /home/vagrant'
    sw.vm.provision :shell, inline: 'ln -s /usr/local/swstarship swstarship', privileged: false

    sw.vm.provision :shell, path: '.development/bin/setup-virtual-host.sh', env: {'APP_NAME' => 'swstarship'}

    sw.vm.provision :shell, path: '.development/bin/run-composer.sh', privileged: false
    sw.vm.provision :shell, path: '.development/bin/compile-messages.sh', privileged: false

    sw.vm.provision :shell, inline: 'systemctl enable httpd && systemctl start httpd'
  end
end
