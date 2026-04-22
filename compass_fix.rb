# Patch pour rendre Compass compatible avec Ruby 3.2+
class File
  class << self
    alias_method :exists?, :exist?
  end
end

# On récupère les arguments passés au script
ARGV.replace(ARGV)

# On charge le binaire original de compass
load `which compass`.strip
