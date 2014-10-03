VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.hostname = "gighub.local"
  config.vm.network :private_network, ip:"33.33.33.47"

  config.vm.provision "ansible" do |ansible|
    ansible.inventory_path = "vagrant/vagrant"
    ansible.playbook = "vagrant/provision.yml"
  end

  config.vm.synced_folder ".", "/var/www/gighub", :nfs => true
end
