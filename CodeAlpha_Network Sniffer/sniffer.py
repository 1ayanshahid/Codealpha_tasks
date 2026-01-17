import tkinter as tk
from tkinter import scrolledtext
from scapy.all import sniff, IP, TCP, UDP, Raw, conf
from datetime import datetime
from threading import Thread

# ---------------- Time ----------------
def current_time():
    return datetime.now().strftime("%Y-%m-%d %H:%M:%S")

# ---------------- Protocol ----------------
def protocol_name(packet):
    if packet.haslayer(TCP):
        return "TCP"
    elif packet.haslayer(UDP):
        return "UDP"
    else:
        return "OTHER"

# ---------------- Packet Handler ----------------
def packet_handler(packet):
    # Build packet info string
    packet_info = f"- Time        : {current_time()}\n"
    if packet.haslayer(IP):
        packet_info += f"- Source IP   : {packet[IP].src}\n"
        packet_info += f"- Destination : {packet[IP].dst}\n"
        packet_info += f"- Protocol    : {protocol_name(packet)}\n"
        if packet.haslayer(TCP):
            packet_info += f"- Src Port    : {packet[TCP].sport}\n"
            packet_info += f"- Dst Port    : {packet[TCP].dport}\n"
        if packet.haslayer(UDP):
            packet_info += f"- Src Port    : {packet[UDP].sport}\n"
            packet_info += f"- Dst Port    : {packet[UDP].dport}\n"
        if packet.haslayer(Raw):
            payload = packet[Raw].load[:50]
            packet_info += f"- Payload (Hex) : {payload.hex()}\n"
    else:
        packet_info += "- Non-IP Packet Captured\n"

    packet_info += "────────────────────────────────────────────────────\n"

    # Insert into GUI
    text_area.configure(state='normal')
    text_area.insert(tk.END, packet_info)
    text_area.yview(tk.END)  # auto-scroll to bottom
    text_area.configure(state='disabled')

# ---------------- Sniff Thread ----------------
def start_sniff():
    conf.L2socket = conf.L3socket  # Windows fallback
    sniff(prn=packet_handler, store=False)

# ---------------- GUI ----------------
root = tk.Tk()
root.title("🖥️ CodeAlpha Network Sniffer")
root.geometry("900x600")
root.configure(bg="#f0f0f0")  # light background for better contrast

# Banner (pinned at top) - BLACK color enhanced
banner_frame = tk.Frame(root, bg="#ffffff", bd=2, relief="raised")
banner_frame.pack(fill="x", padx=10, pady=5)

banner_label = tk.Label(
    banner_frame,
    text="🔐 BASIC NETWORK SNIFFER – CODEALPHA TASK 1",
    font=("Helvetica", 20, "bold"),
    fg="black",
    bg="#ffffff"
)
banner_label.pack(pady=10)

# Scrolled Text Area for packets
text_area = scrolledtext.ScrolledText(root, width=110, height=30, font=("Consolas", 10))
text_area.pack(padx=10, pady=5)
text_area.configure(state='disabled')  # read-only

# Start sniffing in separate thread
sniff_thread = Thread(target=start_sniff, daemon=True)
sniff_thread.start()

# Run GUI
root.mainloop()
